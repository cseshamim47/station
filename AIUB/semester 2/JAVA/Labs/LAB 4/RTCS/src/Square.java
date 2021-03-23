public class Square {
    private double side;
    Square(){}
    public void setSide(double s){
        side = s;
    }
    public double getSide(){
        return side;
    }
    public double getArea(){
        return side*side;
    }
}
