//transpose matrix
//Author : RABBI HOSSEN (20-44220-3)      American International University Bangladesh
#include <iostream>
#include <bits/stdc++.h>
using namespace std;
int main()
{
    //               Bismillah
    int a;
    cin >> a;
    int arr[a][a];
	int tpose[a][a];
    for (int i = 1; i <= a; i++)
    {
        for (int j = 1; j <= a; j++)
        {
            cin >> arr[i][j];
			tpose[j][i] = arr[i][j];
        }
    }
    cout << "\n";

    for (int i = 1; i <= a; i++)
    {
        for (int j = 1; j <= a; j++)
        {
            cout << arr[i][j] << " ";
        }
        cout << "\n";
    }

    cout << "\ntranspos matrix:\n";

    for (int i = 1; i <= a; i++)
    {
        for (int j = 1; j <= a; j++)
        {
            // cout << arr[j][i] << " ";
			cout << tpose[i][j] << " ";
        }
        cout << "\n";
    }
    return 0;
}

/*
3
1 2 3
4 5 6
7 8 9

*/