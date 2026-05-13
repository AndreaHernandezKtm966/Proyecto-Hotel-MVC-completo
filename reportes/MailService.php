<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../libraries/phpmailer/src/Exception.php';
require_once __DIR__ . '/../libraries/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../libraries/phpmailer/src/SMTP.php';

class MailService {

    private function crearMailer() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ktmandre28@gmail.com';
        $mail->Password = 'glga sodc jnvw sssu';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('ktmandre28@gmail.com', 'Sena Resort Hotel');
        return $mail;
    }

    public function enviarBienvenida($email, $nombre) {
        try {
            $mail = $this->crearMailer();
            $mail->addAddress($email, $nombre);
            $mail->isHTML(true);
            $mail->Subject = '¡Bienvenido a Sena Resort Hotel, ' . $nombre . '!';
            $mail->Body = '
            <div style="font-family:Georgia,serif;max-width:620px;margin:auto;border:1px solid #c8a2c8;border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(127,74,138,0.15);">
                <div style="background:linear-gradient(135deg,#7f4a8a,#a678b4);padding:40px 30px;text-align:center;">
                    <h1 style="color:#f3e9f7;margin:0;font-size:28px;letter-spacing:3px;">SENA RESORT HOTEL</h1>
                    <p style="color:#e8d5f0;margin:8px 0 0;font-size:13px;letter-spacing:2px;">EXPERIENCIA EXCLUSIVA</p>
                </div>
                <div style="height:4px;background:linear-gradient(90deg,#a678b4,#c8a2c8,#a678b4);"></div>
                <div style="padding:40px 35px;background:#ffffff;">
                    <h2 style="color:#7f4a8a;font-size:22px;margin-top:0;">Estimado/a <span style="color:#a678b4;">' . $nombre . '</span>,</h2>
                    <p style="color:#444;font-size:15px;line-height:1.8;">
                        Es un placer darle la bienvenida a <strong>Sena resort Hotel</strong>. Su cuenta ha sido creada exitosamente y ya puede disfrutar de todos nuestros servicios exclusivos.
                    </p>
                    <div style="background:#f3e9f7;border-left:4px solid #a678b4;padding:20px 25px;border-radius:6px;margin:25px 0;">
                        <p style="color:#7f4a8a;font-weight:bold;margin:0 0 10px;font-size:15px;">Con su cuenta puede:</p>
                        <ul style="color:#555;font-size:14px;line-height:2;margin:0;padding-left:18px;">
                            <li>Reservar habitaciones de lujo</li>
                            <li>Gestionar y consultar sus reservas</li>
                            <li>Descargar comprobantes en PDF</li>
                            <li>Exportar reportes en Excel</li>
                        </ul>
                    </div>
                    <p style="color:#444;font-size:14px;line-height:1.8;">
                        Estamos a su disposición para hacer de su estadía una experiencia inolvidable.
                    </p>
                    <div style="text-align:center;margin-top:35px;">
                        <a href="http://localhost/proyecto_hotel" 
                           style="background:linear-gradient(135deg,#7f4a8a,#a678b4);color:#f3e9f7;padding:14px 40px;border-radius:6px;text-decoration:none;font-size:15px;letter-spacing:1px;border:1px solid #c8a2c8;">
                            ACCEDER AL PORTAL
                        </a>
                    </div>
                </div>
                <div style="height:4px;background:linear-gradient(90deg,#a678b4,#c8a2c8,#a678b4);"></div>
                <div style="background:#7f4a8a;padding:20px;text-align:center;">
                    <p style="color:#f3e9f7;font-size:12px;margin:0;letter-spacing:1px;">© 2026 Sena Resort Hotel— Todos los derechos reservados</p>
                    <p style="color:#c8a2c8;font-size:11px;margin:5px 0 0;">Este correo es generado automáticamente, por favor no responder.</p>
                </div>
            </div>';
            $mail->send();
        } catch (Exception $e) {
        }
    }

    public function enviarReserva($email, $nombre, $reserva) {
        try {
            $mail = $this->crearMailer();
            $mail->addAddress($email, $nombre);
            $mail->isHTML(true);
            $mail->Subject = '✅ Confirmación de Reserva — Sena Resort Hotel';
            $mail->Body = '
            <div style="font-family:Georgia,serif;max-width:620px;margin:auto;border:1px solid #c8a2c8;border-radius:12px;overflow:hidden;box-shadow:0 4px 20px rgba(127,74,138,0.15);">
                <div style="background:linear-gradient(135deg,#7f4a8a,#a678b4);padding:40px 30px;text-align:center;">
                    <h1 style="color:#f3e9f7;margin:0;font-size:28px;letter-spacing:3px;">SENA RESORT HOTEL</h1>
                    <p style="color:#e8d5f0;margin:8px 0 0;font-size:13px;letter-spacing:2px;">CONFIRMACIÓN DE RESERVA</p>
                </div>
                <div style="height:4px;background:linear-gradient(90deg,#a678b4,#c8a2c8,#a678b4);"></div>
                <div style="padding:40px 35px;background:#ffffff;">
                    <h2 style="color:#7f4a8a;font-size:22px;margin-top:0;">
                        Estimado/a <span style="color:#a678b4;">' . $nombre . '</span>,
                    </h2>
                    <p style="color:#444;font-size:15px;line-height:1.8;">
                        Su reserva ha sido registrada exitosamente. A continuación encontrará el resumen de su estadía.
                    </p>
                    <div style="background:#f3e9f7;border-left:4px solid #a678b4;padding:25px;border-radius:6px;margin:25px 0;">
                        <p style="color:#7f4a8a;font-weight:bold;margin:0 0 15px;font-size:16px;letter-spacing:1px;">📋 DETALLES DE SU RESERVA</p>
                        <table style="width:100%;border-collapse:collapse;">
                            <tr style="border-bottom:1px solid #c8a2c8;">
                                <td style="padding:12px 5px;color:#7f4a8a;font-weight:bold;font-size:14px;">🛏️ Habitación</td>
                                <td style="padding:12px 5px;color:#555;font-size:14px;">' . $reserva['id_habitacion'] . '</td>
                            </tr>
                            <tr style="border-bottom:1px solid #c8a2c8;">
                                <td style="padding:12px 5px;color:#7f4a8a;font-weight:bold;font-size:14px;">📅 Fecha Inicio</td>
                                <td style="padding:12px 5px;color:#555;font-size:14px;">' . $reserva['fecha_inicio'] . '</td>
                            </tr>
                            <tr style="border-bottom:1px solid #c8a2c8;">
                                <td style="padding:12px 5px;color:#7f4a8a;font-weight:bold;font-size:14px;">📅 Fecha Final</td>
                                <td style="padding:12px 5px;color:#555;font-size:14px;">' . $reserva['fecha_final'] . '</td>
                            </tr>
                            <tr style="border-bottom:1px solid #c8a2c8;">
                                <td style="padding:12px 5px;color:#7f4a8a;font-weight:bold;font-size:14px;">👥 Personas</td>
                                <td style="padding:12px 5px;color:#555;font-size:14px;">' . $reserva['num_personas'] . '</td>
                            </tr>
                            <tr>
                                <td style="padding:12px 5px;color:#7f4a8a;font-weight:bold;font-size:14px;">💰 Total</td>
                                <td style="padding:12px 5px;color:#a678b4;font-size:16px;font-weight:bold;">$' . number_format($reserva['precio'], 0, ',', '.') . '</td>
                            </tr>
                        </table>
                    </div>
                    <p style="color:#444;font-size:14px;line-height:1.8;">
                        Gracias por elegirnos. Nuestro equipo estará listo para recibirle y garantizar una estadía excepcional.
                    </p>
                    <div style="text-align:center;margin-top:35px;">
                        <a href="http://localhost/proyecto_hotel" 
                           style="background:linear-gradient(135deg,#7f4a8a,#a678b4);color:#f3e9f7;padding:14px 40px;border-radius:6px;text-decoration:none;font-size:15px;letter-spacing:1px;border:1px solid #c8a2c8;">
                            VER MIS RESERVAS
                        </a>
                    </div>
                </div>
                <div style="height:4px;background:linear-gradient(90deg,#a678b4,#c8a2c8,#a678b4);"></div>
                <div style="background:#7f4a8a;padding:20px;text-align:center;">
                    <p style="color:#f3e9f7;font-size:12px;margin:0;letter-spacing:1px;">© 2026 Sena Resort Hotel — Todos los derechos reservados</p>
                    <p style="color:#c8a2c8;font-size:11px;margin:5px 0 0;">Este correo es generado automáticamente, por favor no responder.</p>
                </div>
            </div>';
            $mail->send();
        } catch (Exception $e) {
            
        }
    }
}