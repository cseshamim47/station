public class Triangle implements IShape{

    private double base;
    private double height;

    Triangle(){}
    Triangle(double base, double height){
        this.base = base;
        this.height = height;
    }

    public void setBase(double base) {
        this.base = base;
    }
    public double getBase() {
        return base;
    }

    public void setHeight(double height) {
        this.height = height;
    }
    public double getHeight() {
        return height;
    }

    public void displayArea(){
        System.out.println("Area of Triangle : "+ (0.5*base*height));
    }
}
