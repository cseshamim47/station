using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using myNewProject.SubFolder;

namespace myNewProject
{
    public class Parent : temp
    {

        public Parent() : this(1)
        {
            Console.WriteLine("Parent Default");
        }
        
        public Parent(int x) : this("shamim")
        {
            Console.WriteLine("Parent int : " + x);
        }
        
        public Parent(string str) 
        {
            Console.WriteLine("Parent string : " + str);
        }

        internal int id;
        //public Parent()
        //{
        //    Console.WriteLine("Parent public");
        //}

        public void m1()
        {
            id = 10;
        }


        public void F1()
        {
            Console.WriteLine("parent empty F1");
        }
        
        public virtual void F1(int x)
        {
            Console.WriteLine("parent int F1 " + x);
        }

        public void F1(int x, int y)
        {
            Console.WriteLine("empty F1 " + x + y);
        }
        
        public void F1(double x, int y)
        {
            Console.WriteLine("empty F1 " + x + y);
        }
        
        public void F1(int x, double y,params string[] str)
        {
            Console.WriteLine("empty F1 " + x + y);
        }
    }
}
