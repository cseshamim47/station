#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n = 4;
    int cnt = 1;
    int arr[n][n];
    int clockwise[n][n];
    int anti_clockwise[n][n];
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n; j++)
        {
            iarr[i][j] = cnt;
            clockwise[j][i] = arr[i][j];
            anti_clockwise[j][i] = arr[i][j];
            cnt++;
            cout << arr[i][j] << " ";
        }
        cout << endl;
    } 
    cout << endl << "Tranpose : " << endl;
    for(auto &i : clockwise)
    {
        for(auto j : i) cout << j << " ";
        cout << endl;
    }

    // here i'm swapping to get Rotate 90 deg clockwise
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n/2; j++)
        {
            
                swap(clockwise[i][j],clockwise[i][n-j-1]);
                // cout << i << " " << j << " : " << i << " " << n-j-1 << endl;
        }
    } 

    cout << endl << "Rotate 90 deg clock-wise : " << endl;
    for(auto &i : clockwise)
    {
        for(auto j : i) cout << j << " ";
        cout << endl;
    }


    // rotate 90 deg anti-clockwise
    for(int col = 0; col < n; col++)
    {
        for(int row = 0; row < n/2; row++)
        {
            swap(anti_clockwise[row][col], anti_clockwise[n-row-1][col]);
                // cout << row << " " << col << " : " << n-row-1 << " " << col << endl;
        }
    }

    cout << endl << "Rotate 90 deg anti-clockwise : " << endl;
    for(auto &i : anti_clockwise)
    {
        for(auto j : i) cout << j << " ";
        cout << endl;
    }

}

// 3 6 9
// 2 5 8
// 1 4 7


//1 2 3 4 
// 5 6 7 8
// 9 10 11 12
// 13 14 15 16

// 4 8 12 16
// 3 7 11 15
// 2 6 10 14
// 1 5 9 13
