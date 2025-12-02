<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f3f4f6; padding:20px;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px; background:white; border-radius:12px; overflow:hidden;">
        <tr>
            <td style="background:#fbbf24; padding:16px 24px; text-align:center; font-weight:bold; font-size:18px;">
                Te Echo Una Mano
            </td>
        </tr>

        <tr>
            <td style="padding:24px;">
                <h1 style="font-size:20px; margin:0 0 12px 0; color:#111827;">
                    {!! nl2br(e($titulo)) !!}
                </h1>

                <p style="font-size:18px; color:#4b5563; line-height:1.5; margin:0 0 16px 0;">
                    {!! nl2br(e($mensaje)) !!}
                </p>

                <p style="font-size:14px; color:#4b5563; line-height:1.5; margin:0;">
                    ¡Gracias por usar <strong>Te Echo Una Mano</strong>!
            </td>
        </tr>

        <tr>
            <td style="padding:16px 24px; font-size:11px; color:#9ca3af; text-align:center;">
                Este correo se ha enviado desde la plataforma <strong>Te Echo Una Mano</strong>.
            </td>
        </tr>
    </table>
</body>
</html>
