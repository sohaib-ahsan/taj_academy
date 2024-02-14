import os
import subprocess
import webbrowser
import tkinter as tk
from PIL import ImageTk, Image

laravel_project_dir = os.getcwd()
laravel_command = "php artisan serve"

root = tk.Tk()
root.title("Starting App")
root.overrideredirect(True)

windowWidth = 600
windowHeight = 400

positionRight = int(root.winfo_screenwidth() / 2 - windowWidth / 2)
positionDown = int(root.winfo_screenheight() / 2 - windowHeight / 2)

root.geometry(f"{windowWidth}x{windowHeight}+{positionRight}+{positionDown}")
imgPath = os.path.join(laravel_project_dir, "public", "images", "start.png")

img = Image.open(imgPath)
img = img.resize((windowWidth, windowHeight))
img = ImageTk.PhotoImage(img)

tk.Label(root, image=img, bg="#a43838").pack()

process = subprocess.Popen(
    laravel_command,
    shell=True,
    stdout=subprocess.PIPE,
    stderr=subprocess.PIPE,
    text=True,
    cwd=laravel_project_dir
)

def open_browser():
    webbrowser.open("http://localhost:8000/home")
    root.destroy()

success_message = "Starting Laravel development server"
while True:
    line = process.stdout.readline()
    if not line:
        break
    if success_message in line:
        root.after(3000, open_browser)
        break

root.mainloop()
try:
    process.wait()
except KeyboardInterrupt:
    process.terminate()
