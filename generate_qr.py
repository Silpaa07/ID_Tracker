import qrcode

# URL of your student ID webpage
url = "http://localhost:8080/Id_Pro/id/student123.html"

# Generate QR code
qr = qrcode.QRCode(
    version=1,
    box_size=10,
    border=4
)
qr.add_data(url)
qr.make(fit=True)

# Make an image
img = qr.make_image(fill="black", back_color="white")

# Save the QR code as an image
img.save("student123_qr.png")

print("✅ QR Code generated and saved as student123_qr.png")
