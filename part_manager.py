from tkinter import *

#Create window object
app = Tk()

#Part
part_text = StringVar()
part_label = Label(app, text='Part Name', font=('bold', 14), pady=20, padx=20)
part_label.grid(row=0, column=0)



app.title("Part Manager")
app.geometry('900x500')


#Start program
app.mainloop()

