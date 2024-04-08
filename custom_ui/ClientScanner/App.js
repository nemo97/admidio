import React, { useState, useEffect } from 'react';
import { RNCamera } from 'react-native-camera';

const App = () => {
  const [barcodes, setBarcodes] = useState([]);

  useEffect(() => {
    const barcodeRecognized = (event) => {
      setBarcodes(event.barcodes);
    };

    RNCamera.onGoogleVisionBarcodesDetected(barcodeRecognized);

    return () => {
      RNCamera.offGoogleVisionBarcodesDetected(barcodeRecognized);
    };
  }, []);

  const renderBarCodes = () => {
    return barcodes.map((barcode) => {
      return (
        <Text key={barcode.data}>{barcode.data}</Text>
      );
    });
  };

  return (
    <RNCamera
      style={styles.camera}
      onGoogleVisionBarcodesDetected={barcodeRecognized}
    >
      {renderBarCodes()}
    </RNCamera>
  );
};

const styles = StyleSheet.create({
  camera: {
    flex: 1,
  },
});

export default App;