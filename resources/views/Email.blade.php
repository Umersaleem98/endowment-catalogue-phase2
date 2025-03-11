<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        .header { background: #4CAF50; color: white; padding: 15px; text-align: center; border-top-left-radius: 8px; border-top-right-radius: 8px; }
        .content { padding: 20px; line-height: 1.6; color: #333; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #555; padding: 10px 0; border-top: 1px solid #ddd; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>{{ $sub }}</h2>
    </div>

    <div class="content">
        <p class="bold">Dear Valued Donor,</p>
        <p>We sincerely appreciate your generous support towards our scholarship program. Your commitment to empowering students through education is truly commendable.</p>
        
        <p>Your contribution is making a lasting impact on students' lives, helping them achieve their academic and professional goals. We will keep you updated on the progress of the students benefiting from your support.</p>
        
        <p>Once again, we extend our heartfelt gratitude for your generosity and belief in our mission. Your support plays a crucial role in shaping the future of deserving students.</p>

        <p class="bold">Best regards,</p>
        <p>University Advancement Office</p>
        <p>NUST Islamabad</p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} NUST. All rights reserved.</p>
    </div>
</div>

</body>
</html>
