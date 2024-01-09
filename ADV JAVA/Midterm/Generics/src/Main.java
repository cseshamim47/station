import java.util.ArrayList;
import java.util.List;

public class Main {

    public static void printList(List<?> ob)
    {
        System.out.println(ob);
    }

    public static void main(String[] args) {
        List<Integer> list = new ArrayList<>();
        list.add(5);
        list.add(10);
        list.add(11);
        printList(list);
    }

}
