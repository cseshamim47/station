public class Circle {
    private double radius;
    Circle(){}
    public void setRadius(double r){
        radius = r;
    }
    public double getRadius(){
        return radius;
    }
    public double getArea(){
        return 3.1416 * radius * radius;
    }

}
