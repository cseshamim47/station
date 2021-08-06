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
    int size,swapCount = 0;
    cin >> size;
    int arr[size];
    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }
    gch
    for (int i = 0; i < size-1; i++)
    {
        int k = i;
        for (int j = i+1; j < size; j++)
        {
            if(arr[j] < arr[k]) k = j;
        }
        if(arr[i] > arr[k]){
            swap(arr[i],arr[k]);
            swapCount++;
        }

        cout << "Pass " << i + 1 << endl;
        for (int i = 0; i < size; i++)
        {
            cout << arr[i] << " ";
        }
        printf("\n\n");
        gch
        
    }
    
    cout << "swap : " << swapCount << endl;

}