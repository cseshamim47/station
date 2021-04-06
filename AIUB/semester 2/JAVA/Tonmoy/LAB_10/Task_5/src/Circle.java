public class Circle extends Shape{
    public double r;
    Circle(double r) { this.r = r;}
    public void drawShape(){
        System.out.println("drawing circle");
    }
    public void calculateArea(){
        System.out.println("Area of Circle : "+ (Math.PI*r*r));
    }
}
