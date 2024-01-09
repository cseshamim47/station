public class Main {
    public static void main(String[] args) {
        Cat cat = new Cat();
        cat.mew();
        cat.info();
        Dog dog = new Dog();
        if(cat.getClass().isAnnotationPresent(VeryImportant.class)){
            System.out.println("Annotation is present!");
        }else System.out.println("Annotation is not present!");
    }
}