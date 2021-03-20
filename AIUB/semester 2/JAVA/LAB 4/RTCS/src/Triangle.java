public class Triangle {
    private double height;
    private double base;

    Triangle(){}
    Triangle(double h,double b){
        height = h;
        base = b;
    }
    public void setHeight(double h){
        height = h;
    }
    public double getHeight(){
        return height;
    }
    public void setBase(double b){
        base = b;
    }
    public double getBase(){
        return base;
    }
    public double getArea(){
        return (0.5)*base*height;
    }
}
