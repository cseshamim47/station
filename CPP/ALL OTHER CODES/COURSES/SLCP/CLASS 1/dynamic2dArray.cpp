#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int** arr = new int*[n];
    for(int i = 0; i < n; i++)
    {
        arr[i] = new int[n];
        for(int j = 0; j < n; j++)
        {
            cin >> arr[i][j];
        }
    }
    for(int c = 0; c < n; c++)
    {
        if(c % 2 == 0)
        {
            for(int r = 0; r < n; r++)
            {
                cout << arr[r][c] << " ";
            }
        }
        else
        {
            for(int r = n-1; r >= 0; r--)
            {
                cout << arr[r][c] << " ";
            }
        }
    }

    for(int i = 0; i < n; i++) // deleting array of pointer
        delete arr[i];

    delete[] arr; // deleting pointer to this array
}

/*
4
11 12 13 14
21 22 23 24
31 32 33 34
41 42 43 44
*/
