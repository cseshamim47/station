public class Square extends Shape{
    public double r;
    Square(double r){this.r = r;}
    public void drawShape(){
        System.out.println("drawing Square");
    }
    public void calculateArea(){
        System.out.println("Area of Square : "+ (r*r));
    }
}
