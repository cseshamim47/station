public class Triangle extends Shape{
    public double base;
    public double height;
    Triangle(double base, double height){
        this.base = base;
        this.height = height;
    }
    public void drawShape(){
        System.out.println("drawing Triangle");
    }
    public void calculateArea(){
        System.out.println("Area of Triangle : "+ (1.0/2.0*base*height));
    }
}
