using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppSingleInheritance
{
    internal class Parent
    {
        internal Parent() : this("c#")
        {
            Console.WriteLine("Parent D");
        }

        internal Parent(int r) : this()
        {
            Console.WriteLine("Parent PI " + r);
        }

        internal Parent(string y)
        {
            Console.WriteLine("Parent PS " + y);
        }

        internal void MethodA()
        {
            Console.WriteLine("Parent MethodA");
        }

        internal virtual void MethodB()
        {
            Console.WriteLine("Parent MethodB");
        }

        internal virtual void MethodC()
        {
            Console.WriteLine("Parent MethodC");
        }
    }
}
