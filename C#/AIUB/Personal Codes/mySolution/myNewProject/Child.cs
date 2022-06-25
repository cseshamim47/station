using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace myNewProject
{
    internal class Child : Parent
    {

        internal Child() : base()
        {
            Console.WriteLine("Child default");
        }
        internal void m2()
        {
            //Parent parent = new Parent();
            //parent.id = 1;

            Child c = new Child();
            c.id = 10;
        }

        public override void F1(int x)
        {
            Console.WriteLine("Child : "+x);
        }
    }
}
