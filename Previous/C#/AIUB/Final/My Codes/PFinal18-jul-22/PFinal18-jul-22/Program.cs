using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PFinal18_jul_22
{
    internal class Program
    {
        static void Main(string[] args)
        {

            object refa = new Test();
            Object refa2 = new Test();

            //refa = refa2;
            Console.WriteLine(refa.ToString());
            Console.WriteLine(refa2.ToString());

            if (refa.GetType() == refa2.GetType()) Console.WriteLine("Equal");
            else Console.WriteLine("Not Equal");

            int x = 10;
            var y = x;
            dynamic d; // can be initialized during runtime
            //Console.WriteLine(d);

        }
    }
}
