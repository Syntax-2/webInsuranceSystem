from http import server
import smtplib

sender_email = "sender@gmail.com"

rec_email = "recever@gmail.com"

password = "password"

message = "hey, this was sent using python"

server = smtplib.SMTP('smtp.gmail.com', 587)
server.starttls()

server.login(sender_email, password)
print("login succes")

server.sendmail(sender_email, rec_email, message)

print("email sent", rec_email)