from tkinter import *

#Create window object
app = Tk()

#Part
part_text = StringVar()
part_label = Label(app, text='Part Name', font=('bold', 14), pady=20, padx=20)
part_label.grid(row=0, column=0, sticky=W)
part_entry = Entry(app, textvariable=part_text, width=46)
part_entry.grid(row=0, column=1)

#Customer
customer_text = StringVar()
customer_label = Label(app, text='Customer', font=('bold', 14), padx=20)
customer_label.grid(row=1, column=2, sticky=W)
customer_entry = Entry(app, textvariable=part_text, width=46)
customer_entry.grid(row=1, column=3)

#Retailer
retailer_text = StringVar()
retailer_label = Label(app, text='Retailer', font=('bold', 14), pady=20, padx=20)
retailer_label.grid(row=1, column=0, sticky=W)
retailer_entry = Entry(app, textvariable=part_text, width=46)
retailer_entry.grid(row=1, column=1)

#Price
part_text = StringVar()
part_label = Label(app, text='Price', font=('bold', 14), pady=20, padx=20)
part_label.grid(row=0, column=2, sticky=W)
part_entry = Entry(app, textvariable=part_text, width=46)
part_entry.grid(row=0, column=3)


app.title("Part Manager")
app.geometry('900x500')


#Start program
app.mainloop()

