public class Start {
    public static void main(String[] args) {
        Animal objRef = new Cat();
        objRef.animalSound();
        objRef = new Dog();
        objRef.animalSound();
        objRef = new Horse();
        objRef.animalSound();
    }
}
