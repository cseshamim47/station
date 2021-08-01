//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }

void solve(){
    int size;
    cin >> size;
    int arr[size];
    char ch[100];
    for(int i = 0; i < size; i++){
        cin >> ch[i];
        arr[i] = ch[i] - 'a';
    }
    int a[100]={0};
    for (int i = 0; i < size-1; i++)
    {
        int k = i;
        for (int j = i+1; j < size; j++)
        {
            if(arr[j] < arr[k]) k = j;
        }
        if(arr[i] > arr[k]){
            swap(arr[i],arr[k]);
            a[i] = 1;
            a[k] = 1;
        }

        
    }
    int sum = 0;
    for(int i = 0; i < 100; i++) sum += a[i];
    cout << sum << "\n";
}

int main()
{
     
    int t;   cin >> t;   w(t);

}