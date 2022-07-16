import java.awt.*;

public class Start {
    public static void main(String[] args) {
        IShape objRef = new Rectangle(4.0,6.0);
        objRef.displayArea();

        objRef = new Triangle(4.0,6.0);
        objRef.displayArea();

        objRef = new Circle(4.0);
        objRef.displayArea();

    }
}
