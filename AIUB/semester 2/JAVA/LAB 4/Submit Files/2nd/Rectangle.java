public class Rectangle {
    private double length;
    private double width;
    Rectangle(){}
    Rectangle(double l, double w){
        length = l;
        width = w;
    }
    public void setLength(double l){
        length = l;
    }
    public double getLength(){
        return length;
    }
    public void setWidth(double w){
        width = w;
    }
    public double getWidth(){
        return width;
    }
    public double getArea(){
        return width*length;
    }
}
