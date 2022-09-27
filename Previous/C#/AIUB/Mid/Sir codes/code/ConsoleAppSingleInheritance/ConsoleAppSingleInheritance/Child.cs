using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppSingleInheritance
{
    internal class Child : Parent
    {
        internal Child() : this(2)
        {
            Console.WriteLine("Child D");
        }

        internal Child(int k) : base(k)
        {
            Console.WriteLine("Child PI " + k);
        }

        internal Child(string k) : this()
        {
            Console.WriteLine("Child PS " + k);
        }

        internal void MethodA()
        {
            Console.WriteLine("Child MethodA");
        }

        internal override void MethodB()
        {
            Console.WriteLine("Child MethodB");   
        }

        internal new void MethodC()
        {
            Console.WriteLine("Child MethodC");
        }

        internal void MethodD()
        {
            Console.WriteLine("Child MethodC");
        }
    }
}
