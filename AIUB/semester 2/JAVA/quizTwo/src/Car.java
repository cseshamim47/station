public class Car {
    private String modelName;
    private int modelYear;
    private String CarType;

    Car(){}
    Car(String mn, int my, String ct){
        modelName = mn;
        modelYear = my;
        CarType = ct;
    }
    public void setModelName(String mn){
        modelName = mn;
    }
    public void setModelYear(int my){
        modelYear = my;
    }
    public void setCarType(String ct){
        CarType = ct;
    }
    public String getModelName(){
        return modelName;
    }
    public int getModelYear(){
        return modelYear;
    }
    public String getCarType(){
        return CarType;
    }
}
