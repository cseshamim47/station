using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace myNewProject
{
    internal class ArrayDekhacchi
    {
        int[] arr = new int[5];
        int[] arr1 = new int[] {1,2,3};
        int[] arr2 = new int[3] {1,2,3};

        int[,] arr2d = new int[3,2] { {1,2}, {3,4}, { 5, 6 } };

        internal ArrayDekhacchi()
        {
            arr2d[0, 1] = 10;
            int row = 0;
            while (row < 3)
            {
                int col = 0;
                while(col < 2)
                {
                    Console.Write(arr2d[row, col] + " ");
                    col++;
                }
                Console.WriteLine();
                row++;
            }
        }

        int[][] jaggedArray = new int[5][];
        internal ArrayDekhacchi(int x)
        {
            int m = 0;
            while (m < jaggedArray.Length)
            {
                jaggedArray[m] = new int[m+3];
                m++;
                //3 4 5 6 7
            }

            int row = 0;
            int y = 1;
            while (row < jaggedArray.Length)
            {
                int col = 0;
                while (col < jaggedArray[row].Length)
                {
                    jaggedArray[row][col] = y++;
                    col++;
                }
                //Console.WriteLine();
                row++;
            }
            row = 0;
            while (row < jaggedArray.Length)
            {
                int col = 0;
                while (col < jaggedArray[row].Length)
                {
                    Console.Write(jaggedArray[row][col] + " ");
                    col++;
                }
                Console.WriteLine();
                row++;
            }

        }
    }
}
