#include <bits/stdc++.h>
using namespace std;

void print(vector <int> v[], int m){
    for(int i = 0; i < m; i++){
        for(int j = 0; j < v[i].size(); j++ ){
            cout << v[i][j] << " ";
        }
        cout << endl << v[i].size() << endl;
    }
}


int main()
{
    int m = 4, n = 3;
    vector <int> arr[m];

    for(int i = 0; i < m; i++){
        for(int j = 0; j < n; j++){
            arr[i].push_back(i);
        }
    }
    print(arr,m);
    
}