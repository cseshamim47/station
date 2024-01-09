public class MainClass {

    public static void main(String[] args) {
        AnnClass ann = new AnnClass();
        ann.print();

        AnnClass obj = new AnnClass(){
            public void print()
            {
                System.out.println("annclass overrided");
            }
        };
        obj.print();

        Runnable myAnnRunnable = new Runnable() {
            @Override
            public void run() {
                System.out.println("Runnable");
            }
        };
        myAnnRunnable.run();
    }
}
