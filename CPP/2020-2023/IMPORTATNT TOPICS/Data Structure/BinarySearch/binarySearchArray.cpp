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
// Time Complexity : O(logN)
int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls
    int size;
    cin >> size;
    int arr[size];
    for(int i = 0; i < size; i++)
        cin >> arr[i];
    int left = 0;
    int right = size - 1;
    int mid,value;
    cout << "Enter value to be searched : ";
    cin >> value;

    int cnt = 0;

    while (left <= right)
    {
        cnt++;
        mid = (left + right)/2;
        if(arr[mid] == value){
            cout << "Found : " << value << " at index ---> " << mid << endl;
            break;
        }else if(arr[mid] < value) left = mid + 1;
        else right = mid - 1;
    }

    if(arr[mid] != value) cout << "Not found" << endl;

    cout << "Count : " <<  cnt << endl;
    

}

// 10
// 1 2 13 14 18 19 21 41 100 988