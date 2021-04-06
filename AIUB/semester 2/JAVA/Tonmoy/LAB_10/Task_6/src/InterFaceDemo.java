public class InterFaceDemo implements IHello, IWelcome{
    public void print(){
        System.out.println("Hello");
    }
    public void welcome(){
        System.out.println("Welcome");
    }
}
