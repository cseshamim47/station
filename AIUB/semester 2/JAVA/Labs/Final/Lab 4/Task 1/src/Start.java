public class Start {
    public static void main(String[] args) {
        Shape objRef = new Rectangle(4.0,6.0);

        objRef.setDim1(101.0);
        objRef.setDim2(100.0);
        System.out.println("Dim1 : "+ objRef.getDim1());
        System.out.println("Dim2 : "+ objRef.getDim2());

        objRef.displayArea();

        objRef = new Triangle(4.0,6.0);
        objRef.displayArea();

        objRef = new Circle(4.0);
        objRef.displayArea();

    }
}
