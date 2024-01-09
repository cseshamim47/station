public class Calc<X extends Number,Y extends Number,OP extends String> {

    X x;
    Y y;
    OP op;
    Calc(X x, Y y, OP op)
    {
        this.x = x;
        this.y = y;
        this.op = op;
    }

    void Calculator()
    {
        double ans = 0;
        if(op == "+") ans = x.doubleValue()+y.doubleValue();
        else if(op == "*") ans = x.doubleValue()*y.doubleValue();
        else if(op == "-") ans = x.doubleValue()-y.doubleValue();
        else if(op == "/") ans = x.doubleValue()/y.doubleValue();
        System.out.println(ans);
    }




}
