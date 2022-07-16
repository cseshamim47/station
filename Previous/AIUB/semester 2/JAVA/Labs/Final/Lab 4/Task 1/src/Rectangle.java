public class Rectangle extends Shape{
    double length;
    double width;

    Rectangle(){}
    Rectangle(double length, double width){
        super(length,width);
        this.length = length;
        this.width = width;
    }

    public void setLength(double length) {
        this.length = length;
    }
    public double getLength() {
        return length;
    }

    public void setWidth(double width) {
        this.width = width;
    }
    public double getWidth() {
        return width;
    }

    public void displayArea(){
        System.out.println("Area of rectangle : "+ (length*width));
    }
}
