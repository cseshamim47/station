import org.w3c.dom.ls.LSOutput;

import java.lang.reflect.Method;

public class OuterClassType1 {
    int number = 6;
    public void heyThere()
    {
        System.out.println("Outerclass!");

        class MethodClass{
            String str = "This is class inside method";
            public void print()
            {
                System.out.println(str);
            }
        }
        MethodClass obj = new MethodClass();
        obj.print();
    }

    public class InnerClassType1 {
        public void innerMethod()
        {
            System.out.println("InnerClass");
        }
    }
    public static class InnerClassType2 {
        public void innerMethod2()
        {
            System.out.println("static InnerClass");
        }
    }
}
