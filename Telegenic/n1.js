var newWindow;
function openWindow() {
newWindow = window.open("", "newWindow", "width=500,height=600");
newWindow.document.write("<center><h1>Welcome...</h1>");
newWindow.document.write("<h3>This is The New Window</h3></center>");
}