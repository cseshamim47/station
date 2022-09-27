using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace self1
{
    internal class A : B
    {
        public A() : this("asif")
        {
            Console.WriteLine("A default");
        }

        public A(string str) : this(10)
        {
            Console.WriteLine("A peramiterized " + str);
        }

        public A(int a) : base()
        {
            Console.WriteLine(a);
        }
    }

}
