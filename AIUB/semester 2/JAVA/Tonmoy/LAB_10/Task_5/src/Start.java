public class Start {
    public static void main(String[] args) {
        Shape objRef = new Circle(5.0);
        objRef.calculateArea();
        objRef = new Triangle(5.0,4.0);
        objRef.calculateArea();
        objRef = new Square(5.0);
        objRef.calculateArea();
    }
}
