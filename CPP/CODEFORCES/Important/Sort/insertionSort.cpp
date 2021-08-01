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
    int size;
    cin >> size;
    int arr[size];
    int cnt = 0;
    for(int i = 0; i < size; i++){
        cin >> arr[i];
    }
    
    for(int i = 1; i < size; i++){
        int v = arr[i];
        if(arr[i] < arr[i-1]){
            for(int j = i-1; j >= 0; j--){
                if(arr[j] > arr[j+1]){
                    swap(arr[j],arr[j+1]);
                    cnt++;
                }else{
                    arr[j+1] = v;
                    break;
                } 
            }
        }
        
        cout << "Pass " << i << endl;
        for (int i = 0; i < size; i++)
        {
            cout << arr[i] << " ";
        }
        printf("\n\n");
        gch
    }

    cout << "Count : " << cnt << endl;


} 