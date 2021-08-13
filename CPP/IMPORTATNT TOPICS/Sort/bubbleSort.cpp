//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }

void solve(){ }

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    // cls
    int size,totalSwap = 0;
    cin >> size;
    int arr[size];

    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }
    // gch
    for(int i = 0; i < size - 1; i++){
        
        bool isRequired = false;
        // cout << size - i - 1 << endl;
        for (int j = 0; j < size-i-1; j++)
        {
            if (arr[j] > arr[j + 1])
            {
                swap(arr[j], arr[j + 1]);
                totalSwap++;
                isRequired = true;
            }
            for(auto x : arr) cout << x << " ";
        }
        cout << "\n";
        cout << "Pass " << i + 1 << endl;
        for (int i = 0; i < size; i++)
        {
            cout << arr[i] << " ";
        }
        printf("\n\n");
        gch
        
        if(!isRequired) break;
    }

    cout << "Total swap : " << totalSwap << endl;

    
}