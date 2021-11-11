import smtplib 
from email.mime.multipart import MIMEMultipart 
from email.mime.text import MIMEText 
from email.mime.base import MIMEBase 
from email import encoders
def gmail():

    fromaddr = "virtualpostbox98@gmail.com"
    toaddr = "sumanthburla12@gmail.com"
    
    # instance of MIMEMultipart 
    msg = MIMEMultipart() 
    
    # storing the senders email address 
    msg['From'] = fromaddr 
    
    # storing the receivers email address 
    msg['To'] = toaddr 
    
    # storing the subject 
    msg['Subject'] = "Traffic violation"
    
    # string to store the body of the mail 
    body = "Dear citizen \n\n\nThis is auto-generated mail from traffic police to inform you that, you have voilated a traffic rule recently. \n Please find the attachment and link to pay the challan as soon as possible. \n\n\nThanks,\n TSgov."
    
    # attach the body with the msg instance 
    msg.attach(MIMEText(body, 'plain')) 
    
    # open the file to be sent 
    filename = "dxc_symbol_blk_rgb_150.png"
    attachment = open(r"dxc_symbol_blk_rgb_150.png", "rb") 
    
    # instance of MIMEBase and named as p 
    p = MIMEBase('application', 'octet-stream') 
    
    # To change the payload into encoded form 
    p.set_payload((attachment).read()) 
    
    # encode into base64 
    encoders.encode_base64(p) 
    
    p.add_header('Content-Disposition', "attachment; filename= %s" % filename) 
    
    # attach the instance 'p' to instance 'msg' 
    msg.attach(p) 
    
    # creates SMTP session 
    s = smtplib.SMTP('smtp.gmail.com', 587) 
    
    # start TLS for security 
    s.starttls() 
    
    # Authentication 
    s.login(fromaddr, "givemypostt") 
    
    # Converts the Multipart msg into a string 
    text = msg.as_string() 
    
    # sending the mail 
    s.sendmail(fromaddr, toaddr, text) 
    
    # terminating the session 
    s.quit()

gmail()
print("don")