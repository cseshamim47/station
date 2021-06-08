#include <bits/stdc++.h>
using namespace std;
void run(){
    int n;
    cin >> n;
    int arr[n];
    int neg = 0;
    for(int i = 0; i < n; i++){
        cin >>  arr[i];
        if(arr[i] < 0) neg=1;
    }

    if(neg){
        cout << "NO\n";
        return;
    }

    cout << "yes\n";
    cout << 201 << endl;

    for(int i = 0; i <= 200; i++){
        cout << i << " ";
    }

    cout << endl;
}
int main()
{
    int t;
    cin >> t;
    while(t--){
        run();
    }


    
}