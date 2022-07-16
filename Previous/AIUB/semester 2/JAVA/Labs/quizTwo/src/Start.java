public class Start {
    public static void main(String[] args) {
        Car empty = new Car();
        Car obj1 = new Car("Totoya 234", 2012, "Racing Car");
        
        empty.setModelName("Ferrari 123");
        empty.setModelYear(2021);
        empty.setCarType("Super Car");

        System.out.println("Car 1 Model Name : "+empty.getModelName());
        System.out.println("Car 1 Model Year : "+empty.getModelYear());
        System.out.println("Car 1 Type : "+empty.getCarType());

        obj1.setModelName("Vugatti Verun");
        obj1.setModelYear(2030);
        obj1.setCarType("King Car");

        System.out.println();
        System.out.println("Car 2 Model Name : "+obj1.getModelName());
        System.out.println("Car 2 Model Year : "+obj1.getModelYear());
        System.out.println("Car 2 Type : "+obj1.getCarType());
        
    }
}
