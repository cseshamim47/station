public class Start {

    public static void main(String[] args) {
        // empty constructors
        Rectangle empty = new Rectangle();
        Triangle emptyOne = new Triangle();
        Circle emptyTwo = new Circle();
        Square emptyThree = new Square();
        // ..............
        Rectangle rObj = new Rectangle(2.5,2.5);
        System.out.println("Area of Rectangle : "+rObj.getArea());

        Triangle tObj = new Triangle(2.5,2.5);
        System.out.println("Area of Triangle : "+tObj.getArea());

        Circle cObj = new Circle();
        cObj.setRadius(2.5);
        cObj.getRadius();
        System.out.println("Area of Circle : "+cObj.getArea());

        Square sObj = new Square();
        sObj.setSide(2.5);
        sObj.getSide();
        System.out.println("Area of Square : "+sObj.getArea());
    }
}
