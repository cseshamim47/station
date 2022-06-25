using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_jun_22
{

    /*
     * 
     ************ MID -> MCQ(OMR PENCIL) + OUTPUT TRACING (1 OUT OF 2) + PROGRAM WRITING 
     * 
     * 
     * 
        method overloading
        1. number of parameter
        2. type of parameter
        3. sequence of parameter

        # return type doesnt matter
        # helpful in finite situation ( finding absolute value )
        # 

        -------params-------
        # Parameter Modifier ( changes regular parameter behaviour )
        # keyward - params -> It can changes parameter length to a variable
        # Condition
        # 1. Must be used with array
        # 2. One method must use one params
        # 3. Rightmost paramenter should be param in case of multiple parameter
        # 

        # ref -> converts value to reference
        # in/out -> also works and ref
        # params -> multi parameter
        # default parameter valued/ optional parameter
        # named parameter (break sequene of the parameter)
        # 
        # 

    */
    internal class Program
    {
        static void Main(string[] args)
        {
            Calculator Obj = new Calculator();

            int[] Arr = new int[] { 1, 2, 3, 4, 5 };
            int sum = Obj.addition(Arr);

            Console.WriteLine("{0}", Obj.addition(new int[] { 1, 2, 3 }));

            Sample s = new Sample();
            Console.WriteLine("{0}", s.summation(1, 2, 3, 4,5));

            int p = 10;
            int q = 10, r;
            s.Swap(ref p,ref q);
            Console.WriteLine("{0}, {1}", p, q);

            //s.M1(out r);

            //s.M3(p,q);

            //s.M4(r:4, p:5, q:6); // named parameter


        }


    }
}
