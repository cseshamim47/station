public class Start {
    public static void main(String[] args) {
        Shape objRef = new Circle(15.0);
        objRef.drawShape();  // task 5
        objRef.calculateArea();
        objRef = new Triangle(12.0,4.0);
        objRef.drawShape(); // task 5
        objRef.calculateArea();
        objRef = new Square(6.0);
        objRef.drawShape(); // task 5
        objRef.calculateArea();
    }
}
