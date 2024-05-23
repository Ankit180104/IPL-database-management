import tkinter as tk
import tkinter.ttk as ttk
import tkinter.messagebox as messagebox
import webbrowser
class LoginPage:
    def __init__(self, root):
        self.root = root
        self.root.title("Login Page")
        self.root.geometry("300x150")     
        self.username_label = ttk.Label(root, text="Username:")
        self.username_label.pack()
        self.username_entry = ttk.Entry(root)
        self.username_entry.pack()      
        self.password_label = ttk.Label(root, text="Password:")
        self.password_label.pack()
        self.password_entry = ttk.Entry(root, show="*")
        self.password_entry.pack()      
        self.login_button = ttk.Button(root, text="Login", command=self.login)
        self.login_button.pack()
        self.open_localhost_button = ttk.Button(root, text="Click to view Database", command=self.open_localhost_page)
        self.open_localhost_button.pack()
    def login(self):
        username = self.username_entry.get()
        password = self.password_entry.get()
        # Add your login logic here
        if username == "ankit" and password == "ankit1234": 
            messagebox.showinfo("Success", "Login successful!")
        else:
            messagebox.showerror("Error", "Invalid username or password")

    def open_localhost_page(self):
        webbrowser.open_new_tab("http://localhost:50786/") 
if __name__ == "__main__":
    root = tk.Tk()
    app = LoginPage(root)
    root.mainloop()
